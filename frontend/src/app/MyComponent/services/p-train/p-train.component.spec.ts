import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PTrainComponent } from './p-train.component';

describe('PTrainComponent', () => {
  let component: PTrainComponent;
  let fixture: ComponentFixture<PTrainComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PTrainComponent]
    });
    fixture = TestBed.createComponent(PTrainComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
