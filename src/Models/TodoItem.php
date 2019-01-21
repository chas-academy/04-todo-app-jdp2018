<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        self::$db->query("INSERT INTO todos (title, created) VALUES ('$title', NOW())");
        self::$db->execute();
    }

    public static function updateTodo($todoId, $title, $completed = null)
    {
        self::$db->query("UPDATE todos SET title='$title', completed='$completed' WHERE id=$todoId");
        self::$db->execute();
    }

    public static function deleteTodo($todoId)
    {
        self::$db->query("DELETE FROM todos WHERE id=$todoId");
        self::$db->execute();
    }
}
