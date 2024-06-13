import React, { useState } from "react";
import Filter from "./components/Filter";
import NewTask from "./components/NewTask";
import ToDoList from "./components/ToDoList";
import "./App.css";

const App = () => {
  const [tasks, setTasks] = useState([]);
  const [hideCompleted, setHideCompleted] = useState(false);

  const addTask = (text) => {
    setTasks([...tasks, { id: Date.now(), text, completed: false }]);
  };

  const toggleComplete = (id) => {
    setTasks(
      tasks.map((task) =>
        task.id === id ? { ...task, completed: !task.completed } : task
      )
    );
  };

  return (
    <div className="App">
      <h1>To Do List</h1>
      <Filter
        hideCompleted={hideCompleted}
        setHideCompleted={setHideCompleted}
      />
      <NewTask addTask={addTask} />
      <ToDoList
        tasks={tasks}
        toggleComplete={toggleComplete}
        hideCompleted={hideCompleted}
      />
    </div>
  );
};

export default App;
