import { Injectable } from "@angular/core";
import { Http, RequestOptions, Headers, Response } from "@angular/http";
import { Constants } from "../../shared/constant";

import { Observable } from 'rxjs';
import { catchError } from 'rxjs/operators';
import { LoginModel } from "./login.model";


import { HttpClient, HttpHeaders } from "@angular/common/http";
const token = localStorage.getItem('tokenLogin');
const httpOptions = {
    headers: new HttpHeaders({
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + token
    })
};
@Injectable()
export class LoginService {
    private baseUrl: string = '';
    private baseUrlGC: string = '';
    constructor(
        private http: HttpClient,
    ) {
        this.baseUrl = "http://localhost:8000/" + Constants.LoginUrl;
    }

    checkLogin(username: string, password: string): Observable<LoginModel> {
        const logindata = {
            email: username,
            password: password
        }
        return this.http.post<LoginModel>(`${this.baseUrl}`, logindata).pipe();
    }
}
