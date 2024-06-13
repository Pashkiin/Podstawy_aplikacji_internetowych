import React from "react";
import Task from "./Task";

const ToDoList = ({ tasks, toggleComplete, hideCompleted }) => {
  const filteredTasks = hideCompleted
    ? tasks.filter((task) => !task.completed)
    : tasks;

  return (
    <div>
      {filteredTasks.length === 0 ? (
        <p>No tasks available</p>
      ) : (
        filteredTasks.map((task) => (
          <Task key={task.id} task={task} toggleComplete={toggleComplete} />
        ))
      )}
    </div>
  );
};

export default ToDoList;
