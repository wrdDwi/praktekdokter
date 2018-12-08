import { Injectable, Inject, PLATFORM_ID } from "@angular/core";
import { isPlatformBrowser } from "@angular/common";

@Injectable()
export class UserService {

    private _userSession: any;
    private _platformId: Object;
    constructor(@Inject(PLATFORM_ID) private platformId: Object) {
    }

    get userId() {
        if (localStorage.getItem('userId')) {
            return localStorage.getItem('userId');
        }
        // if (isPlatformBrowser(this.platformId))
        //     if (this._userSession)
        //         return this._userSession.UserId.toLocaleUpperCase();
    }
    get tokenApi(){
        if (localStorage.getItem('tokenLogin')) {
            return localStorage.getItem('tokenLogin');
        }
    }
    get username(){
        if (localStorage.getItem('name')) {
            return localStorage.getItem('name');
        }
    }

    get roles() {
        if (localStorage.getItem('role')) {
            return localStorage.getItem('role');
        }
        // if (isPlatformBrowser(this.platformId))
        //     if (this._userSession)
        //         return this._userSession.Roles;
    }

    get permissions() {
        if (isPlatformBrowser(this.platformId))
            if (this._userSession)
                return this._userSession.Permissions;
    }

    setUser(userSession: string) {
        if (userSession)
            this._userSession = JSON.parse(userSession.replace(";", ""));
    }

    isAccessRestricted(code: string): boolean {
// || this.userId === Constants.superadmin
        if (this.permissions.indexOf(code) > -1 )
            return false;
        else
            return true;
    }
}
