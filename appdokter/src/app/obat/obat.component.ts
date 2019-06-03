import { Component, OnInit } from '@angular/core';
import { FormControl, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { JenisObat } from './obat.model';

@Component({
  selector: 'app-obat',
  templateUrl: './obat.component.html',
  styleUrls: ['./obat.component.css']
})
export class ObatComponent implements OnInit {

  constructor(
    private fb: FormBuilder,
    private router: Router,
    private route: ActivatedRoute,
  ) {
  }
  private listJenisObat = JenisObat[] = [];
  private kdObats: FormControl;
  private namaObats: FormControl;
  private jenisObats: FormControl;
  private stock: FormControl;
  private hargaBeli: FormControl;
  private hargaJual: FormControl;
  private kdSatuan: FormControl;
  private formObats: FormGroup;
  private errMsg: string[];
  // tslint:disable-next-line:no-inferrable-types
  private validEdit: boolean = false;
  

  ngOnInit() {
    this.errMsg = [];
    
    this.route.data.forEach(data => {
     
    });
  }
initFormObat() {
  this.kdObats = new FormControl('', [Validators.required]);
  this.namaObats = new FormControl('', [Validators.required]);
  this.jenisObats = new FormControl('', [Validators.required]);
  
}
}
