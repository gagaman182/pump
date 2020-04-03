<template>
  <div class="home">
    <fish-row>
      <fish-col span="24">
        <datatable title="" :columns="tableColumns1" :rows="tableRows1" />
        <datatable
          title="รายการตรวจเช็คบำรุงรักษาเครื่องปั้ม / เครื่องจักรบ่อบำบัดน้ำเสีย"
          :columns="loadpumphead"
          :rows="tableloadpump"
        >
          <!-- @row-click="onRowClick"
        > -->
          <th slot="thead-tr">
            รายละเอียด
          </th>
          <template slot="tbody-tr" scope="props">
            <td>
              <button
                class="btn red darken-2 waves-effect waves-light compact-btn"
                @click="e => onRowClick(props.row, e)"
              >
                <i class="material-icons white-text">add_to_queue</i>
              </button>
            </td>
          </template>
        </datatable>
      </fish-col>
    </fish-row>
    <fish-modal
      title="ใบตรวจเช็คบำรุงรักษา"
      :visible.sync="showModal"
      attached="right"
    >
      <fish-row>
        <fish-col span="24">
          <fish-card color="blue" fluid>
            <div slot="header">
              <i class="material-icons white-text">library_books</i
              ><strong>รายละเอียด</strong>
            </div>
            <fish-form inline>
              <fish-field>
                <span>
                  ลำดับใบตรวจเช็ค:
                  {{ tableloadpump_detail[0].num }}
                </span>
              </fish-field>
              <fish-field>
                <span>
                  ช่วงเดือนบำรุงรักษา:
                  {{ tableloadpump_detail[0].month }}
                  เดือน
                </span>
              </fish-field>
              <fish-field>
                <span>
                  สถานที่:
                  {{ tableloadpump_detail[0].place }}
                </span>
              </fish-field>
              <fish-field>
                <span>
                  ยี่ห้อ:
                  {{ tableloadpump_detail[0].p_pump_brand }}
                </span>
              </fish-field>
              <fish-field>
                <span>
                  ON:
                  {{ tableloadpump_detail[0].on_number }}
                </span>
              </fish-field>
              <fish-field>
                <span>
                  หมายเลขเครื่อง / รุ่น:
                  {{ tableloadpump_detail[0].p_pump }}
                </span>
              </fish-field>
              <fish-field>
                <span>
                  ID:
                  {{ tableloadpump_detail[0].id }}
                </span>
              </fish-field>
              <fish-field>
                <span>
                  วันที่ตรวจเช็ค:
                  {{ tableloadpump_detail[0].dateservice }}
                </span>
              </fish-field>
            </fish-form>
          </fish-card>
          <fish-divider />
          <fish-card color="blue" fluid>
            <div slot="header">
              <i class="material-icons white-text">web</i
              ><strong>รายการตรวจเช็ค</strong>
            </div>
            <pre>{{ tableloadpump_detail }}</pre>
          </fish-card>
        </fish-col>
      </fish-row>
    </fish-modal>
  </div>
</template>

<script>
import DataTable from 'vue-materialize-datatable';
import axios from 'axios';
import {APIPath} from '../../service/APIPath';
const apiPath = new APIPath();

export default {
  name: 'Home',
  components: {
    datatable: DataTable,
  },
  data() {
    return {
      showModal: false,
      loadpumphead: [
        {
          label: 'เลขที่ใบตรวจเช็ค',
          field: 'num',
          numeric: false,
          html: false,
        },
        {
          label: 'ช่วงเดือนบำรุงรักษา',
          field: 'month',
          numeric: false,
          html: false,
        },
        {
          label: 'สถานที่',
          field: 'place',
          numeric: false,
          html: false,
        },
        {
          label: 'ยี่ห้อ',
          field: 'p_pump_brand',
          numeric: false,
          html: false,
        },
        {
          label: 'ON',
          field: 'on_number',
          numeric: false,
          html: false,
        },
        {
          label: 'หมายเลขเครื่อง / รุ่น',
          field: 'p_pump',
          numeric: false,
          html: false,
        },
        {
          label: 'ID',
          field: 'id',
          numeric: false,
          html: false,
        },
        {
          label: 'วันที่ตรวจเช็ค',
          field: 'dateservice',
          numeric: false,
          html: false,
        },
        {
          label: 'หัวหน้าประปา ',
          field: 'boss_approve',
          numeric: false,
          html: false,
        },
        {
          label: 'ผู้ตรวจสอบ',
          field: 'inspector_approve',
          numeric: false,
          html: false,
        },
        {
          label: 'รองผู้อำนวยการฝ่ายบริหาร',
          field: 'manage_approve',
          numeric: false,
          html: false,
        },
      ],
      tableloadpump: [],
      tableloadpump_detail: '40',
    };
  },
  methods: {
    loadpump() {
      axios

        .get(`${apiPath.getBaseUrl()}visit_data.php`)
        .then(response => (this.tableloadpump = response.data));
    },
    //คลิกที่แถว
    onRowClick: function(row) {
      // alert(row.num);
      console.log(row.num);
      this.showModal = true;
      this.getpump(row.num);
    },
    //ดูรายละเอียดใบเช็ค
    getpump(num) {
      axios

        .get(`${apiPath.getBaseUrl()}visit_data_detail.php`, {
          params: {num: num},
        })
        .then(response => (this.tableloadpump_detail = response.data));
    },
  },
  mounted() {
    this.loadpump();
  },
};
</script>
