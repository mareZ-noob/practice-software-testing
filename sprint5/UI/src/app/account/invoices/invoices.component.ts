import {Component, OnInit} from '@angular/core';
import {InvoiceService} from "../../_services/invoice.service";
import {Invoice} from "../../models/invoice";
import {first} from "rxjs/operators";
import {Pagination} from "../../models/pagination";
import {NavigationService} from "../../_services/navigation.service";

@Component({
  selector: 'app-invoices',
  templateUrl: './invoices.component.html',
  styleUrls: ['./invoices.component.css']
})
export class InvoicesComponent implements OnInit {
  currentPage: number = 1;
  results: Pagination<Invoice>;

  constructor(private invoiceService: InvoiceService,
              private navigationService: NavigationService) {
  }

  ngOnInit(): void {
    this.getInvoices();
  }

  getInvoices() {
    this.invoiceService.getInvoices(this.currentPage)
      .pipe(first())
      .subscribe(
        (invoices) => {
          this.results = invoices;
        },
        (error) => {
          if (error.status === 401 || error.status === 403) {
            this.navigationService.redirectToLogin();
          }
        }
      );
  }

  onPageChange(page: number) {
    // Handle page change here (e.g., fetch data for the selected page)
    this.currentPage = page;
    this.getInvoices();
  }

}
