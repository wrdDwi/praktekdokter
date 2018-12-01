import { Injectable, Inject } from '@angular/core';

@Injectable()
export class ConfigService {

    private origURL: string;

    constructor(
        @Inject('ORIGIN_URL') originalURL: string) {
        this.origURL = originalURL;
    }

    getApiURL() {
        return this.origURL;
    }
}
