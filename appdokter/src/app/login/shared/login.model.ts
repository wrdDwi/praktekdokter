export interface LoginModel {
     token: string;
     msg: string;
     status: string;
    user: userData;
}
export class userData{
    name: string;
    userId: string;
    role: number;
}
