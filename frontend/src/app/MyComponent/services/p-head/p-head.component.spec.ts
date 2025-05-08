import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PHeadComponent } from './p-head.component';

describe('PHeadComponent', () => {
  let component: PHeadComponent;
  let fixture: ComponentFixture<PHeadComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PHeadComponent]
    });
    fixture = TestBed.createComponent(PHeadComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
