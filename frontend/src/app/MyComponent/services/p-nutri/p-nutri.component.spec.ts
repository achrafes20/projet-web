import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PNutriComponent } from './p-nutri.component';

describe('PNutriComponent', () => {
  let component: PNutriComponent;
  let fixture: ComponentFixture<PNutriComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PNutriComponent]
    });
    fixture = TestBed.createComponent(PNutriComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
