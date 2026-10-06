<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index()
    {
        $taskModel = new TaskModel();

        $data['tasks'] = $taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks/index', $data);
    }

    public function new()
    {
        return view('tasks/form', [
            'title' => 'Add New Task',
            'task'  => null,
        ]);
    }

    public function create()
    {
        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'task_date'   => 'required|valid_date[Y-m-d]',
            'description' => 'permit_empty|max_length[1000]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
            'is_archived' => 0,
        ]);

        return redirect()
            ->to('/tasks')
            ->with('message', 'Task created successfully.');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if (!$task || $task['is_archived'] == 1) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('tasks/form', [
            'title' => 'Edit Task',
            'task'  => $task,
        ]);
    }

    public function update($id)
    {
        $rules = [
            'title'       => 'required|min_length[3]|max_length[255]',
            'task_date'   => 'required|valid_date[Y-m-d]',
            'description' => 'permit_empty|max_length[1000]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $taskModel = new TaskModel();

        $task = $taskModel->find($id);

        if (!$task || $task['is_archived'] == 1) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $taskModel->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'task_date'   => $this->request->getPost('task_date'),
        ]);

        return redirect()
            ->to('/tasks')
            ->with('message', 'Task updated successfully.');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();

        $task = $taskModel->find($id);

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Soft delete: the record remains in the database.
        $taskModel->update($id, [
            'is_archived' => 1,
        ]);

        return redirect()
            ->to('/tasks')
            ->with('message', 'Task archived successfully.');
    }
}