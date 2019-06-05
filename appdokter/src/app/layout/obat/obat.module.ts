import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListObatComponent } from './list-obat/list-obat.component';
<<<<<<< HEAD
import { ObatRoutingModule, routeComponentObat } from './obat-routing.module';
import { ObatService } from './obat.service';
import { ObatResolver } from './obat.resolver';
import { PageHeaderModule } from '../../shared';

@NgModule({
  imports: [
    CommonModule,
    ObatRoutingModule,
    PageHeaderModule
  ],
  providers: [ObatService, ObatResolver],
  declarations: [routeComponentObat]
=======
import { NewObatComponent } from './new-obat/new-obat.component';
import { ObatRoutingModule } from './obat-routing.module';
import { PageHeaderModule } from '../../shared';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import {DataTableModule} from "angular-6-datatable";
@NgModule({
  imports: [
    CommonModule,
    ObatRoutingModule, PageHeaderModule,
    FormsModule,
    ReactiveFormsModule,
    DataTableModule
  ],
  declarations: [ListObatComponent,NewObatComponent]
>>>>>>> 43f65ddba130c73af607be9f8394a75c93519134
})
export class ObatModule { }
