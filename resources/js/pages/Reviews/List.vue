<template>
    <div class="container">
    <div class="top-search-bar mt-3">
      <search-bar></search-bar>
    </div>
    <div class="card mt-3" v-for="review in reviews" v-bind:key="review.id">
      <div class="card-body">
        <h5 class="h5 card-title">
          {{ review.company.name }}
        </h5>
        <div class="font-weight-lighter d-flex">
          <p class="mb-0">総合評価</p>
          <star-rating :starNum="3"></star-rating>
        </div>
        <div class="d-flex flex-row">
        <div style="width: 46px; height: 46px; border: 1px #efefef solid; border-radius: 50%; overflow: hidden; margin-right:5px;">
        </div>
        <div>
          <div class="font-weight-bold">
            {{ review.user.school_name }}/{{ review.user.graduation_year }}/{{ review.user.sex }}
          </div>
          <div class="font-weight-lighter">
            {{ review.work_style }}, {{ review.type_of_occupation}}
          </div>
        </div>
          <template v-if="review.user_id === 1">
          <!-- dropdown -->
          <div class="ml-auto card-text">
            <div class="dropdown">
              <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button type="button" class="btn btn-link text-muted m-0 p-2">
                  <i class="fas fa-ellipsis-v"></i>
                </button>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="/reviews/${review.id}/edit">
                  <i class="fas fa-pen mr-1"></i>編集する
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $review->id }}">
                  <i class="fas fa-trash-alt mr-1"></i>削除する
                </a>
              </div>
            </div>
          </div>
          <!-- dropdown -->
  
          <!-- modal -->
          <div id="modal-delete-{{ $review->id }}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="/reviews/{{$review->id}}">
                  @csrf
                  @method('DELETE')
                  <div class="modal-body">
                    この口コミを削除します。よろしいですか？
                  </div>
                  <div class="modal-footer justify-content-between">
                    <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                    <button type="submit" class="btn btn-danger">削除する</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- modal -->
        </template>

        </div>
      </div>
      <div class="card-body pt-0 pb-2">
        <div class="card-text">
          {{review.body}}
        </div>
      </div>
    </div>
    </div>
</template>

<script>
import StarRating from '../../components/StarRating.vue'
import SearchBar from '../../components/SerchBar.vue'
export default {
  components: {
    StarRating,
    SearchBar
  },
  data() {
    return {
      reviews: []
    }
  },
  methods: {
    async getReviews() {
      this.reviews = [];
      const response = await axios.get('api/v1/reviews');
      this.reviews = response.data;
    }
  },
  mounted() {
    this.getReviews()
  }
}
</script>

<style>

</style>