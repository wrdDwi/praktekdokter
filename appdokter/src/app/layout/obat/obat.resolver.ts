import { Injectable } from "@angular/core";
import { Resolve, ActivatedRouteSnapshot } from "@angular/router";
import { Obat } from "./obat.model";
import { ObatService } from "./obat.service";


@Injectable()
export class ObatResolver implements Resolve<Obat>{
    constructor(private obatService: ObatService) {

    }
    resolve(route: ActivatedRouteSnapshot) {
        return this.obatService.getListObat();
    }
}
