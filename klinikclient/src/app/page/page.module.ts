import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PageRoutingModule } from './page-routing.module';
import { MenuComponent } from './menu/menu.component';
import { PageComponent } from './page.component';
import { SidebarComponent } from './sidebar/sidebar.component';
import { NgbDropdownModule } from '@ng-bootstrap/ng-bootstrap';
import { TranslateModule } from '@ngx-translate/core';
import { NewObatComponent } from './obat/new-obat/new-obat.component';
@NgModule({
  declarations: [MenuComponent,PageComponent,SidebarComponent, NewObatComponent],
  imports: [
    CommonModule,
    PageRoutingModule,
    TranslateModule,
    NgbDropdownModule.forRoot()
  ]
})
export class PageModule { }
