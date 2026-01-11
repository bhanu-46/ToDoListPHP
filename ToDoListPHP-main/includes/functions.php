<?php

// Add new task
function addTask($conn, $task) {
    $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->bind_param("s", $task);
    return $stmt->execute();
}

// Get all tasks
function getTasks($conn) {
    return $conn->query("SELECT * FROM tasks ORDER BY id DESC");
}

// Mark task as completed
function markComplete($conn, $id) {
    $stmt = $conn->prepare("UPDATE tasks SET status = 'completed' WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// Delete task
function deleteTask($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
