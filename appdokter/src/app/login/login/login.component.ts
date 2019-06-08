import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { routerTransition } from '../../router.animations';
import { FormControl, FormGroup, Validators, FormBuilder } from '@angular/forms';
import { LoginService } from '../shared/login.service';
import { LoginModel } from '../shared/login.model';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss'],
    animations: [routerTransition()]
})
export class LoginComponent implements OnInit {
    constructor(
        private fb: FormBuilder,
        private router: Router,
        private route: ActivatedRoute,
        private loginservice: LoginService

    ) {
    }
    private username: FormControl;
    private password: FormControl;
    private loginForm: FormGroup;
    private loginModel: LoginModel[];
    private errMsg: string[];
    private returnUrl: string;
    private logged: boolean = false;
    ngOnInit() {
        this.errMsg = [];
        this.username = new FormControl('', [Validators.required]);
        this.password = new FormControl('', [Validators.required]);
        this.loginForm = this.fb.group({
            username: this.username,
            password: this.password
        });
        this.returnUrl = this.route.snapshot.queryParams['returnUrl'] || '/';
    }

    onLoggedin() {
        this.errMsg = [];
        let paramUsername = this.username.value;
     console.log(paramUsername);
        this.loginservice.checkLogin(paramUsername, this.password.value).subscribe(res => {
            console.log(res);
            if (res.status == '1') {
                this.logged = true;
                localStorage.setItem('tokenLogin', res.token);
                localStorage.setItem('name', res.user.name);
                localStorage.setItem('userId', res.user.userId.toString());
                localStorage.setItem('isLoggedin', 'true');
                this.router.navigate([this.returnUrl])
               

            } else {
                this.errMsg.push(res.msg);
            }
        });
    }
}
