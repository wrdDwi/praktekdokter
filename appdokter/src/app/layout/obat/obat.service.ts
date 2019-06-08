import { Injectable } from '@angular/core';

import { Constants } from '../../shared/constant';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { Obat } from './obat.model';
import { RequestOptions, Headers } from '@angular/http';
import { ConfigService } from '../../shared/services/config.service';
import { UserService } from '../../shared/services/user.service';

@Injectable({
  providedIn: 'root'
})
export class ObatService {

  private baseUrl: string = '';
  private baseUrlGC: string = '';
  constructor(
    private http: HttpClient,
    private configService: ConfigService,
    private userService: UserService,
  ) {
    this.baseUrl = configService.getApiURL + Constants.ObatUrl;
  }

  getListObat(): Observable<Obat[]> {
    let header = new Headers();
    header.append("Content-Type", "application/json");
    header.append("Authorization", "Bearer " + this.userService.tokenApi)
    console.log(header);
    let options = new RequestOptions({ headers: header });
    return this.http.post<Obat[]>(`${this.baseUrl}/`, '').pipe();
  }
  getObat(id : string): Observable<Obat> {
    let header = new Headers();
    header.append("Content-Type", "application/json");
    header.append("Authorization", "Bearer " + this.userService.tokenApi);
    let params= {
      id: id
    }
    let options = new RequestOptions({ headers: header });
    return this.http.post<Obat>(`${this.baseUrl}/getObat`, params).pipe();
  }
  saveObats(obats: Obat): Observable<Obat>{
    let header = new Headers();
    header.append("Content-Type", "application/json");
    header.append("Authorization", "Bearer " + this.userService.tokenApi);
    let options = new RequestOptions({ headers: header });
    return this.http.post<Obat>(`${this.baseUrl}/insertObat`, obats).pipe();
  }
}
