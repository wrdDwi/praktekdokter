import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ListObatComponent } from './list-obat/list-obat.component';
import { NewObatComponent } from './new-obat/new-obat.component';


const routes: Routes = [
    {
        path: '', component: ListObatComponent
    },
    {
        path: '/new', component: NewObatComponent
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class ObatRoutingModule {
}
