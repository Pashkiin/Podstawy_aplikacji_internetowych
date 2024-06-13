import React from "react";

const Filter = ({ hideCompleted, setHideCompleted }) => {
  return (
    <div>
      <label>
        <input
          type="checkbox"
          checked={hideCompleted}
          onChange={(e) => setHideCompleted(e.target.checked)}
        />
        Hide Completed
      </label>
    </div>
  );
};

export default Filter;
