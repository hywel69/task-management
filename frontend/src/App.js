import React, { useState } from "react";
import { motion } from "framer-motion";

export default function App() {
  const [isLoggedIn, setIsLoggedIn] = useState(false);
  const [user, setUser] = useState("");
  const [tasks, setTasks] = useState([]);
  const [task, setTask] = useState({ title: "", description: "" });

  const handleLogin = (e) => {
    e.preventDefault();
    if (user.trim() === "") {
      alert("Isi username dulu, jangan males!");
      return;
    }
    setIsLoggedIn(true);
  };

  const handleLogout = () => {
    setIsLoggedIn(false);
    setUser("");
  };

  const handleTaskChange = (e) => {
    setTask({ ...task, [e.target.name]: e.target.value });
  };

  const handleAddTask = (e) => {
    e.preventDefault();
    if (!task.title.trim()) {
      alert("Judul task kosong, gimana sih!");
      return;
    }
    setTasks([...tasks, task]);
    setTask({ title: "", description: "" });
  };

  if (!isLoggedIn) {
    return (
      <div className="flex h-screen items-center justify-center bg-gray-100">
        <motion.div
          initial={{ opacity: 0, scale: 0.9 }}
          animate={{ opacity: 1, scale: 1 }}
          className="bg-white p-8 rounded-2xl shadow-lg w-96"
        >
          <h2 className="text-2xl font-bold text-center mb-6">Login</h2>
          <form onSubmit={handleLogin} className="space-y-4">
            <input
              type="text"
              placeholder="Username"
              className="w-full border border-gray-300 rounded-lg px-3 py-2"
              value={user}
              onChange={(e) => setUser(e.target.value)}
            />
            <button
              type="submit"
              className="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
            >
              Masuk
            </button>
          </form>
        </motion.div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gray-50 p-6">
      <div className="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-6">
        <div className="flex justify-between items-center mb-6">
          <h1 className="text-xl font-semibold">Halo, {user} 👋</h1>
          <button
            onClick={handleLogout}
            className="bg-red-500 text-white px-4 py-1 rounded-lg hover:bg-red-600"
          >
            Logout
          </button>
        </div>

        <form onSubmit={handleAddTask} className="space-y-4 mb-6">
          <input
            type="text"
            name="title"
            placeholder="Judul Task"
            className="w-full border border-gray-300 rounded-lg px-3 py-2"
            value={task.title}
            onChange={handleTaskChange}
          />
          <textarea
            name="description"
            placeholder="Deskripsi"
            className="w-full border border-gray-300 rounded-lg px-3 py-2"
            rows="3"
            value={task.description}
            onChange={handleTaskChange}
          ></textarea>
          <button
            type="submit"
            className="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700"
          >
            Tambah Task
          </button>
        </form>

        <div>
          <h2 className="text-lg font-semibold mb-2">Daftar Task</h2>
          {tasks.length === 0 ? (
            <p className="text-gray-500">Belum ada task, ayo kerja dikit lah!</p>
          ) : (
            <ul className="space-y-3">
              {tasks.map((t, index) => (
                <motion.li
                  key={index}
                  initial={{ opacity: 0, y: 10 }}
                  animate={{ opacity: 1, y: 0 }}
                  className="border border-gray-200 rounded-lg p-3 shadow-sm"
                >
                  <h3 className="font-bold">{t.title}</h3>
                  <p className="text-gray-600">{t.description}</p>
                </motion.li>
              ))}
            </ul>
          )}
        </div>
      </div>
    </div>
  );
}
