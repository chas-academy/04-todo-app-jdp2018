<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller
{
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $result = TodoItem::createTodo($body['title']);

        if ($result) {
            TodoItem::createTodo($todoId);
        }
        $this->redirect('/');
    }

    public function update($urlParams)
    {
        $body = filter_body(); // gives you the body of the request (the "envelope" contents)
        $todoId = $urlParams['id']; // the id of the todo we're trying to update
        $completed = isset($body['status']) ? 'true' : 'false'; // whether or not the todo has been checked or not
        $title =$body['title'];

        
        TodoItem::updateTodo($todoId, $title, $completed);
        $this->redirect('/');   
        
    }

    public function delete($urlParams)
    {
        $body = filter_body();
        $todoId = $urlParams['id'];
        $completed = isset($body['status']) ? 1 : 0;
        TodoItem::deleteTodo($todoId);

        $this->redirect('/');
    }
}
