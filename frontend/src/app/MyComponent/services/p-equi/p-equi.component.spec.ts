import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PEquiComponent } from './p-equi.component';

describe('PEquiComponent', () => {
  let component: PEquiComponent;
  let fixture: ComponentFixture<PEquiComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PEquiComponent]
    });
    fixture = TestBed.createComponent(PEquiComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
