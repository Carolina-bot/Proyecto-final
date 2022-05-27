import { Component, OnInit } from '@angular/core';
import { DataService } from '../../sevices/data.service';
import { Plato } from '../../models/plato/plato.interface';
import { FormBuilder, FormGroup } from '@angular/forms';
import { PlatoService } from '../../sevices/plato/plato.service';

@Component({
  selector: 'app-plato',
  templateUrl: './plato.component.html',
  styleUrls: ['./plato.component.css'],
})
export class PlatoComponent implements OnInit {

  constructor(public servicio: DataService, private formBuilder: FormBuilder, private servicioPlato: PlatoService) {
    this.form = this.createForm();
  }

  public platos: Plato[] = [];

  public detallePlato: Plato | undefined;

  public form: FormGroup;

  public createForm() {
    return this.formBuilder.group({
      id: [''],
      Nombre: [''],
      Tipo: [''],
      Altranuces: [''],
      Apio: [''],
      Cacahuetes: [''],
      Crustaceos: [''],
      Sulfitos: [''],
      Cascara: [''],
      Gluten: [''],
      Sesamo: [''],
      Huevo: [''],
      Lacteos: [''],
      Moluscos: [''],
      Mostaza: [''],
      Pescado: [''],
      Soja: [''],
    });
  }

  ngOnInit(): void {
    this.getPlatos();
  }

  public getPlatos() {
    this.servicio.getPlatos().subscribe((response) => {
      this.platos = response;
    });
  }

  public onModificar(platoId: number) {
    this.servicio.getPlatoId(platoId).subscribe((response) => {
      console.log(response);
      this.servicioPlato.disparador.emit({
        data: response
      })
    });
  }

  public onDelete(platoId: number): void{
    this.servicio.deletePlato(platoId).subscribe();
    window.location.reload();
  }
}
