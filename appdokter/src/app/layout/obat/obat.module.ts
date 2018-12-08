import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ListObatComponent } from './list-obat/list-obat.component';
import { ObatRoutingModule, routeComponentObat } from './obat-routing.module';

@NgModule({
  imports: [
    CommonModule,
    ObatRoutingModule
  ],
  declarations: [routeComponentObat]
})
export class ObatModule { }
