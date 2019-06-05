import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewObatComponent } from './new-obat.component';

describe('NewObatComponent', () => {
  let component: NewObatComponent;
  let fixture: ComponentFixture<NewObatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewObatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewObatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
