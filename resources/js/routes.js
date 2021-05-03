import AllDqcModel from "./components/DqcModel/AllDqcModel";
import CreateDqcModel from "./components/DqcModel/CreateDqcModel";
import EditDqcModel from "./components/DqcModel/EditDqcModel";

export const routes = [
    {
        name: 'dqc-model-list',
        path: '/',
        component: AllDqcModel
    },
    {
        name: 'create-dqc-model',
        path: '/create-dqc-model',
        component: CreateDqcModel
    },
    {
        name: 'edit-dqc-model',
        path: '/edit-dqc-model/:id',
        component: EditDqcModel
    }
];
