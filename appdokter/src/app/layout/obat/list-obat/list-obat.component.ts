import { Component, OnInit } from '@angular/core';
import { routerTransition } from '../../../router.animations';
import { ObatService } from '../obat.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormBuilder } from '@angular/forms';
import { Obat } from '../obat.model';

@Component({
  selector: 'app-list-obat',
  templateUrl: './list-obat.component.html',
  styleUrls: ['./list-obat.component.scss'],
  animations: [routerTransition()]
})
export class ListObatComponent implements OnInit {

  private listObat: Obat[];

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private obatservice: ObatService
  ) { }

  ngOnInit() {
    this.obatservice.getListObat().subscribe(res => {
      console.log(res);
      this.listObat = res;
    });
  }
}
