import Template from "./components/Layout/Template";
import Home from "./components/Home/Home";
import AllDqcModel from "./components/DqcModel/AllDqcModel";
import CreateDqcModel from "./components/DqcModel/CreateDqcModel";
import EditDqcModel from "./components/DqcModel/EditDqcModel";
import AllDqc84 from "./components/Dqc84/AllDqc84";
import CreateDqc84 from "./components/Dqc84/CreateDqc84";
import EditDqc84 from "./components/Dqc84/EditDqc84";
import AllDqc841 from "./components/Dqc841/AllDqc841";
import CreateDqc841 from "./components/Dqc841/CreateDqc841";
import EditDqc841 from "./components/Dqc841/EditDqc841";
import ReportList from "./components/Report/ReportList";

export const routes = [
    {
        path: '/',
        component: Template,
        children: [
            {
                name: 'home',
                path: '/',
                component: Home
            },
            {
                name: 'dqc-model-list',
                path: '/dqc-model-list',
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
            },
            {
                name: 'dqc-84-list',
                path: '/dqc-84-list',
                component: AllDqc84
            },
            {
                name: 'create-dqc-84',
                path: '/create-dqc-84',
                component: CreateDqc84
            },
            {
                name: 'edit-dqc-84',
                path: '/edit-dqc-84/:id',
                component: EditDqc84
            },
            {
                name: 'dqc-841-list',
                path: '/dqc-841-list',
                component: AllDqc841
            },
            {
                name: 'create-dqc-841',
                path: '/create-dqc-841',
                component: CreateDqc841
            },
            {
                name: 'edit-dqc-841',
                path: '/edit-dqc-841/:id',
                component: EditDqc841
            },
            {
                name: 'report-list',
                path: '/report-list',
                component: ReportList
            }
        ]
    },
];
