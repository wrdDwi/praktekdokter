import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewObatComponent } from './view-obat.component';

describe('ViewObatComponent', () => {
  let component: ViewObatComponent;
  let fixture: ComponentFixture<ViewObatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ViewObatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ViewObatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
