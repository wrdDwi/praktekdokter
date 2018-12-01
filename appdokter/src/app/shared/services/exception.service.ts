import { Injectable, Inject } from '@angular/core';
import { Observable } from "rxjs";

@Injectable()
export class ExceptionService {

    public handleError(error: any) {
        // tslint:disable-next-line:prefer-const
        let serverError = error.json();
        let modelStateErrors: string = '';

        if (!serverError.type) {
            for (const key in serverError) {
                if (serverError[key])
                    modelStateErrors += serverError[key] + '\n';
            }
        }

        modelStateErrors = modelStateErrors = '' ? null : modelStateErrors;

        return Observable.throw(modelStateErrors || 'Server error');
    }
}
