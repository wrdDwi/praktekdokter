import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListObatComponent } from './list-obat/list-obat.component';
import { NewObatComponent } from './new-obat/new-obat.component';



const routes: Routes = [
    {
        path: '',
        component: ListObatComponent
        // children: [
        //     { path: '', redirectTo: '', pathMatch: 'full' },
        //    // { path: 'create', component: ObatComponent },
        //     // { path: 'modify/:obatId', component: ObatComponent, resolve: { bizTrade: '' } },
        //     // { path: 'view/:obatId', component: ViewObatComponent, resolve: { bizTrade: '' } }

        // ]
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class ObatRoutingModule {
}

export const routeComponentObat = [
    ListObatComponent,
  NewObatComponent,
    // ViewObatComponent
];
