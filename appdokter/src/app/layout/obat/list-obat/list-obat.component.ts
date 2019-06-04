import { Component, OnInit } from '@angular/core';
import { Obats } from '../obat.model';

@Component({
  selector: 'app-list-obat',
  templateUrl: './list-obat.component.html',
  styleUrls: ['./list-obat.component.scss']
})
export class ListObatComponent implements OnInit {
private listObat:Obats[]=[];
  constructor() { }

  ngOnInit() {
  }

}
