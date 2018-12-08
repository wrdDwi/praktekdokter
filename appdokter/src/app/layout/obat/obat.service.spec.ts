import { TestBed, inject } from '@angular/core/testing';

import { ObatService } from './obat.service';

describe('ObatService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [ObatService]
    });
  });

  it('should be created', inject([ObatService], (service: ObatService) => {
    expect(service).toBeTruthy();
  }));
});
