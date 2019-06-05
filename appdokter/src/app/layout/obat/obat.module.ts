import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
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
})
export class ObatModule { }
