import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AddObatComponent } from './add-obat.component';

describe('AddObatComponent', () => {
  let component: AddObatComponent;
  let fixture: ComponentFixture<AddObatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddObatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AddObatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
