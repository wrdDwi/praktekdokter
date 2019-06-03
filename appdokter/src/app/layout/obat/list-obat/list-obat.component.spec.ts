import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListObatComponent } from './list-obat.component';

describe('ListObatComponent', () => {
  let component: ListObatComponent;
  let fixture: ComponentFixture<ListObatComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListObatComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListObatComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
