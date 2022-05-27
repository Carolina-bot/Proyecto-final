import { Injectable } from '@angular/core';
import { Plato } from '../models/plato/plato.interface';
import { Menu } from '../models/menu/menu.interface';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class DataService {
  constructor(public http: HttpClient) {}

  public apiUrl = 'https://localhost:8000/api/';

  getPlatos(): Observable<Plato[]> {
    return this.http.get<Plato[]>(this.apiUrl + 'platos');
  }

  getPlatoId(platoId: any): Observable<Plato[]> {
    return this.http.get<Plato[]>(this.apiUrl + 'plato/' + platoId);
  }

  addPlato(plato: Plato): Observable<Plato[]> {
    return this.http.post<Plato[]>(this.apiUrl + 'plato', plato);
  }

  updatePlato(platoId: any):Observable<any>{
    return this.http.put<any>( this.apiUrl + 'plato/' + platoId.id, platoId );
  }

  deletePlato(platoId: any):Observable<any>{
    return this.http.delete<any>( this.apiUrl + 'plato/' + platoId);
  }

  getMenus(): Observable<Menu[]> {
    return this.http.get<Menu[]>(this.apiUrl + 'menus');
  }

  getMenuId(menuId: any): Observable<Menu[]> {
    return this.http.get<Menu[]>(this.apiUrl + 'menu/' + menuId);
  }

  addMenu(menu: Menu): Observable<Menu[]> {
    return this.http.post<Menu[]>(this.apiUrl + 'menu', menu);
  }

  updateMenu(menuId: any):Observable<any>{
    return this.http.put<any>( this.apiUrl + 'menu/' + menuId.id, menuId );
  }

  deleteMenu(menuId: any):Observable<any>{
    return this.http.delete<any>( this.apiUrl + 'menu/' + menuId);
  }

}
