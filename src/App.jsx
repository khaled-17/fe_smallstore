// Filename - App.js

import React from "react";
import { BrowserRouter as Router, Route } from "react-router-dom";
import {  createBrowserRouter, createRoutesFromElements, RouterProvider } from 'react-router-dom';

import Addingproduct from "./page/Addingproduct/Addingproduct.jsx";
import Productlist from "./page/Productlist/Productlist.jsx";
import NotFound from "./NotFound.jsx";
  

const router = createBrowserRouter(
	createRoutesFromElements(
	  <Route >
    <Route path="/" element={<Productlist />} />
    <Route path="/add-product" element={<Addingproduct />} />
 	<Route path="*" element={<NotFound />} />
	  </Route>
	)
  )


function App({routes}) {
	 

	return (
	  <>
      <RouterProvider router={router}/>
    </>
// 		<BrowserRouter>

// 		<Router>
//   <Route path="/" element={<Productlist />} />
//     <Route path="/add-product" element={<Addingproduct />} />
//     <Route path="Productlist" element={<Productlist />} />
//  	  </Router>

// 		</BrowserRouter>

	);
}

export default App;
