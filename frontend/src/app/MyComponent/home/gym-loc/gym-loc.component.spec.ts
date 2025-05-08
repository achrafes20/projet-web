import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GymLocComponent } from './gym-loc.component';

describe('GymLocComponent', () => {
  let component: GymLocComponent;
  let fixture: ComponentFixture<GymLocComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [GymLocComponent]
    });
    fixture = TestBed.createComponent(GymLocComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
