import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ObatComponent } from './obat.component';

describe('ObatComponent', () => {
  let component: ObatComponent;
  let fixture: ComponentFixture<ObatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ObatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ObatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
