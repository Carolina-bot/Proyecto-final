import { Component, OnInit } from '@angular/core';
import { PlatoService } from '../../sevices/plato/plato.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { DataService } from '../../sevices/data.service';
import { Plato } from '../../models/plato/plato.interface';

@Component({
  selector: 'app-form-plato',
  templateUrl: './form-plato.component.html',
  styleUrls: ['./form-plato.component.css'],
})
export class FormPlatoComponent implements OnInit {
  constructor(public servicio: DataService, private formBuilder: FormBuilder, private servicioPlato: PlatoService) {
    this.form = this.createForm();
  }

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

  public platos: Array<any> = [];

  ngOnInit(): void {
    this.servicioPlato.disparador.subscribe((data) => {
      this.platos = [];
      this.platos.push(data);
    });
  }

  public update(){
    console.log(this.form.value);
    const datos = { ...this.detallePlato, ...this.form.value };
    this.servicio.updatePlato(datos).subscribe(response => {
      this.detallePlato = { ...this.detallePlato, ...this.form.value };
      });
  }
}
