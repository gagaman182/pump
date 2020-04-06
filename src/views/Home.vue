<template>
  <div class="home">
    <fish-row>
      <fish-col span="24">
        <fish-card fluid color="teal">
          <div slot="header">
            <h3 class="head">
              <vue-fontawesome icon="copy" size="2"></vue-fontawesome
              >รายการตรวจเช็คบำรุงรักษาเครื่องปั้ม / เครื่องจักรบ่อบำบัดน้ำเสีย
            </h3>
          </div>
          <datatable title="" :columns="tableColumns1" :rows="tableRows1" />
          <datatable
            title="ตารางตรวจเช็คบำรุงรักษา"
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
                  @click="(e) => onRowClick(props.row, e)"
                >
                  <i class="material-icons white-text">add_to_queue</i>
                </button>
              </td>
            </template>
          </datatable>
        </fish-card>
      </fish-col>
    </fish-row>
    <fish-modal
      title="ใบตรวจเช็คบำรุงรักษา"
      :visible.sync="showModal"
      attached="right"
    >
      <fish-row>
        <fish-col span="24">
          <fish-card color="orange" fluid>
            <div slot="header">
              <i class="material-icons white-text">library_books</i
              ><strong>รายละเอียด</strong>
            </div>
            <fish-form inline>
              <fish-field label=" ลำดับใบตรวจเช็ค:" inline>
                <h4>{{ tableloadpump_detail[0].num }}</h4>
              </fish-field>
              <fish-field label=" ช่วงเดือนบำรุงรักษา:" inline>
                <h4>{{ tableloadpump_detail[0].month }} เดือน</h4>
              </fish-field>
              <fish-field label=" สถานที่:" inline>
                <h4>{{ tableloadpump_detail[0].place }}</h4>
              </fish-field>
              <fish-field label=" ยี่ห้อ:" inline>
                <h4>{{ tableloadpump_detail[0].p_pump_brand }}</h4>
              </fish-field>
              <fish-field label=" ON:" inline>
                <h4>{{ tableloadpump_detail[0].on_number }}</h4>
              </fish-field>
              <fish-field label=" หมายเลขเครื่อง / รุ่น:" inline>
                <h4>{{ tableloadpump_detail[0].p_pump }}</h4>
              </fish-field>
              <fish-field label=" ID:" inline>
                <h4>{{ tableloadpump_detail[0].id }}</h4>
              </fish-field>
              <fish-field label=" วันที่ตรวจเช็ค:" inline>
                <h4>{{ tableloadpump_detail[0].dateservice }}</h4>
              </fish-field>
            </fish-form>
          </fish-card>
          <fish-divider />
          <fish-card color="orange" fluid>
            <div slot="header">
              <i class="material-icons white-text">web</i
              ><strong>รายการตรวจเช็ค</strong>
            </div>
            <fish-row>
              <fish-col span="6" class="demo-col"><h4>รายการ</h4></fish-col>
              <fish-col span="6" class="demo-col"
                ><h4>แนวทางการตรวจเช็ค</h4></fish-col
              >
              <fish-col span="6" class="demo-col"><h4>สถานะ</h4></fish-col>
              <fish-col span="6" class="demo-col"><h4>หมายเหตุ</h4></fish-col>
            </fish-row>
            <fish-divider fitted></fish-divider>
            <!-- 1 ชุดสายไฟเครื่องปั้ม  -->
            <Wire :pumpall="idcheck" v-show="p1_show" />
            <fish-divider fitted></fish-divider>

            <!-- 2 ตรวจสอบการ ทำงานของเครื่อง  -->
            <Service :pumpall="idcheck" v-show="p2_show" />
            <fish-divider fitted></fish-divider>
          </fish-card>
        </fish-col>
      </fish-row>
    </fish-modal>
  </div>
</template>

<script>
import DataTable from "vue-materialize-datatable";
import axios from "axios";
import { APIPath } from "../../service/APIPath";
const apiPath = new APIPath();

import Wire from "@/components/Wire.vue";
import Service from "@/components/Service.vue";

export default {
  name: "Home",
  components: {
    datatable: DataTable,
    Wire,
    Service,
  },
  data() {
    return {
      idcheck: "",
      p1_show: true,
      p2_show: true,
      p3_show: true,
      p4_show: true,
      p5_show: true,
      p6_show: true,
      p7_show: true,
      p8_show: true,
      p9_show: true,
      p10_show: true,
      p11_show: true,
      p12_show: true,
      p13_show: true,

      showModal: false,
      loadpumphead: [
        {
          label: "เลขที่ใบตรวจเช็ค",
          field: "num",
          numeric: false,
          html: false,
        },
        {
          label: "ช่วงเดือนบำรุงรักษา",
          field: "month",
          numeric: false,
          html: false,
        },
        {
          label: "สถานที่",
          field: "place",
          numeric: false,
          html: false,
        },
        {
          label: "ยี่ห้อ",
          field: "p_pump_brand",
          numeric: false,
          html: false,
        },
        {
          label: "ON",
          field: "on_number",
          numeric: false,
          html: false,
        },
        {
          label: "หมายเลขเครื่อง / รุ่น",
          field: "p_pump",
          numeric: false,
          html: false,
        },
        {
          label: "ID",
          field: "id",
          numeric: false,
          html: false,
        },
        {
          label: "วันที่ตรวจเช็ค",
          field: "dateservice",
          numeric: false,
          html: false,
        },
        {
          label: "หัวหน้าประปา ",
          field: "boss_approve",
          numeric: false,
          html: false,
        },
        {
          label: "ผู้ตรวจสอบ",
          field: "inspector_approve",
          numeric: false,
          html: false,
        },
        {
          label: "รองผู้อำนวยการฝ่ายบริหาร",
          field: "manage_approve",
          numeric: false,
          html: false,
        },
      ],
      tableloadpump: [],
      tableloadpump_detail: "0",
      wire_detail: "0",
    };
  },

  methods: {
    loadpump() {
      axios.get(`${apiPath.getBaseUrl()}visit_data.php`).then((response) => {
        this.tableloadpump = response.data;
        //ส่งเลขไปให้ compunent
        this.idcheck = this.tableloadpump_detail;
      });
      // check li show
      this.li_check();
    },
    //คลิกที่แถว
    onRowClick: function(row) {
      // alert(row.num);
      console.log(row.num);
      this.showModal = true;
      //ดูรายละเอียดใบเช็ค
      this.getpump(row.num);
    },
    //ดูรายละเอียดใบเช็ค
    getpump(num) {
      axios

        .get(`${apiPath.getBaseUrl()}visit_data_detail.php`, {
          params: { num: num },
        })
        .then((response) => {
          this.tableloadpump_detail = response.data;
          //ส่งเลขไปให้ compunent
          this.idcheck = this.tableloadpump_detail;
        });
    },
  },
  mounted() {
    this.loadpump();
  },
};
</script>
