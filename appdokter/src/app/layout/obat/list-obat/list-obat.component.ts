import { Component, OnInit } from '@angular/core';
<<<<<<< HEAD
import { routerTransition } from '../../../router.animations';
import { ObatService } from '../obat.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormBuilder } from '@angular/forms';
import { Obat } from '../obat.model';
=======
import { Obats } from '../obat.model';
>>>>>>> 43f65ddba130c73af607be9f8394a75c93519134

@Component({
  selector: 'app-list-obat',
  templateUrl: './list-obat.component.html',
<<<<<<< HEAD
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
=======
  styleUrls: ['./list-obat.component.scss']
})
export class ListObatComponent implements OnInit {
private listObat:Obats[]=[];
  constructor() { }

  ngOnInit() {
  }

>>>>>>> 43f65ddba130c73af607be9f8394a75c93519134
}
