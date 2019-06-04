import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListObatComponent } from './list-obat/list-obat.component';
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
})
export class ObatModule { }
