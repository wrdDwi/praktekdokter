import { Component, OnInit } from '@angular/core';
import { FormControl, Validators, FormGroup, FormBuilder } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-new-obat',
  templateUrl: './new-obat.component.html',
  styleUrls: ['./new-obat.component.scss']
})
export class NewObatComponent implements OnInit {

  constructor(
    private fb: FormBuilder,
    private router: Router,
    private route: ActivatedRoute,
  ) {
  }
  // private listJenisObat = JenisObat[] = [];
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
    this.stock = new FormControl('', []);
    this.hargaBeli = new FormControl('', []);
    this.hargaJual = new FormControl('', []);
    this.kdSatuan = new FormControl('', []);
    this.formObats = new FormGroup({
      kdObats: this.kdObats,
      namaObats: this.namaObats,
      jenisObats: this.jenisObats,
      stock: this.stock,
      hargaBeli: this.hargaBeli,
      hargaJual: this.hargaJual,
      kdSatuan: this.kdSatuan
    });
  }

}
