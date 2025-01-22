import React from "react";

import SettingPage from "./pages/SettingPage";
import CollectionsPage from "./pages/CollectionsPage";
import { createHashRouter, RouterProvider } from "react-router-dom";
import NewCollectionsPage from "./pages/NewCollectionPage";

const router = createHashRouter([
  {
    path: "setting",
    element: <SettingPage />,
  },
  {
    path: "collection/new",
    element: <NewCollectionsPage />,
  },
  {
    path: "*",
    element: <CollectionsPage />,
  },
]);

function App() {
  return <RouterProvider router={router} />;
}

export default App;
