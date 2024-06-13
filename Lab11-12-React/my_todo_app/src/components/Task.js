import React from "react";

const Task = ({ task, toggleComplete }) => {
  return (
    <div style={{ textDecoration: task.completed ? "line-through" : "none" }}>
      <input
        type="checkbox"
        checked={task.completed}
        onChange={() => toggleComplete(task.id)}
      />
      {task.text}
    </div>
  );
};

export default Task;
