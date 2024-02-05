import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App.jsx";

 
ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
)

// const router = createBrowserRouter(
//   createRoutesFromElements(
//     <Route>
//     <Route path="/" element={<Productlist />} />
//     <Route path="/add-product" element={<Addingproduct />} />
//     <Route path="Productlist" element={<Productlist />} />

//     </Route>
//   )
// );

// ReactDOM.createRoot(document.getElementById("root")).render(
//   <React.StrictMode>
//     <RouterProvider router={router} />
//   </React.StrictMode>
// );